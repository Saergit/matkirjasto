var MongoClient = require('mongodb').MongoClient;
var ObjectId = require('mongodb').ObjectID;

var express = require('express');
var bodyParser = require('body-parser');
var multer = require('multer');

var storage = multer.diskStorage({
  destination: function (req, file, cb) {
    // tallennushakemisto kuville
    cb(null, 'uploads/')
  },
  filename: function (req, file, cb) {
    // kuvan nimeksi alkuperäinen tiedostonimi
    cb(null, file.originalname);
  }
});

var upload = multer({ storage: storage });

var Validator = require('jsonschema').Validator;
var v = new Validator();

// porttinumero
const PORT = 4320;

// moduuli testauksia varten
var assert = require('assert');

// tietokantayhteyden URL
var url = 'mongodb://localhost:27017/matkirjasto';
var db;

var MATERIAL_COLLECTION = 'materials';
var app = express();


// alustuksia
 app.all('*', function(req, res, next) {
   res.header('Access-Control-Allow-Origin', '*');
   res.header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
   res.header('Access-Control-Allow-Headers', 'X-Requested-With, content-type, Authorization');
   next();
 });

// schema validointia varten
// tarkistetaan et se tiedosto on oikean muotoinen tietokantaan(?)
var materialSchema = {
  'id': '/MaterialSchema',
  'type': 'object',
  'properties': {
    'name': {
      'type': 'string'
    },
    'type': {
      'type': 'string'
    },
    'values': {
      'type': 'object' // tää pitää sisällään mekaaniset materiaalikohtaiset tiedot. ne on myös objekteja
    },
    'location': {
      'type': 'string'
    },
    'image': {
      'type': 'string'
    }
  },
  // pakolliset kentät
  'required': ['name', 'type']
};

var findDocuments = function(db, callback) {
  // Get the documents collection
  var collection = db.collection(MATERIAL_COLLECTION);
  // Find some documents
  collection.find({}).toArray(function(err, docs) {
    assert.equal(err, null);
    console.log("Found the following records");
    console.log(docs)
    callback(docs);
  });
}

var testi = function(db, callback) {
  // Get the documents collection
  // Find some documents
  var limit = { 
    name: 1,
    type: 1,
    location: 1,
    image: 1
  };
  db.collection(MATERIAL_COLLECTION).find({}).toArray((err, result) => {
    console.log(result);
	callback(result);
	
	console.log("callback fun");
  }); 
}

// Tietokantayhteyden muodostus
// mongoon yhdistäminen


MongoClient.connect(url, (err, database) => {
  db = database;
  console.log("Tietokantayhteys muodostettu");
  
  
  
  var collection = db.collection(MATERIAL_COLLECTION);
  

	testi(db, function() {
		
	});
	
});

//etusivu
app.get('/', (req, res) => {
 res.sendFile(path.join(__dirname + '/index.html'));
});

// haetaan kaikki
app.get('/all', (req, res) => {
  var limit = { 
    name: 1,
    type: 1,
    location: 1,
    image: 1
  };
  db.collection(MATERIAL_COLLECTION).find({}, limit).toArray((err, result) => {
	console.log(result);
	res.send(result);
	console.log("testi2");
  });
  
});

// haku id:n mukaan
app.get('/id/:id', (req, res) => {
  var id = { '_id': new ObjectId(encodeURIComponent(req.params.id)) };
  db.collection(MATERIAL_COLLECTION).find(id).toArray((err, result) => {
    if (result) {
      res.json(result);
    } else {
      res.json({});
    }
  });
});

// haku materiaalin nimen mukaan
app.get('/material/:name', (req, res) => {
  var name = { name: encodeURIComponent(req.params.name) };
  db.collection(MATERIAL_COLLECTION).find(name).toArray((err, result) => {
    if (result) {
      res.json(result);
    } else {
      res.json({});
    }
  });
});

// haku tyypin mukaan
app.get('/type/:type', (req, res) => {
  var type = { type: encodeURIComponent(req.params.type) };
  db.collection(MATERIAL_COLLECTION).find(type).toArray((err, result) => {
    if (result) {
      res.json(result); 
    } else {
      res.json({});
    }
  });
});

// haku paikan mukaaan
app.get('/location/:location', (req, res) => {
  var location = { location: encodeURIComponent(req.params.location) };
  db.collection(MATERIAL_COLLECTION).find(location).toArray((err, result) => {
    if (result) {
      res.json(result);
    } else {
      res.json({});
    }
  });
});

// uuden materiaalin lisäys
app.post('/material/add', upload.single('image'), (req, res) => {
  var request = req.body;
  // lisätään kuva objektiin, jos se on lisättynä
  if (request.image) {
    request.image = req.file.path;
  } 
  // validointi
  if (v.validate(request, materialSchema).valid) {
    // nimi ja tyyppi muunnetaan pieniksi kirjaimiksi
    request.name = request.name.toLowerCase();
    request.type = request.type.toLowerCase();

    db.collection(MATERIAL_COLLECTION).save(request, (err, result) => {
      if (result) {
        console.log('Lisätty');
      }
      res.json(result);
    });  
  }
});

// materiaalin päivitys
app.put('/material/update/:id', (req, res) => {
  console.log(req.params.id);  
  var id = { '_id': new ObjectId(encodeURIComponent(req.params.id)) };
  var request = req.body;
  db.collection(MATERIAL_COLLECTION).updateOne(id, request, (err, result) => {
    if (result) {
        console.log('Päivitetty');
    }
    res.json(result);
  });
});

// materiaalin poistaminen
app.delete('/material/delete/:id', (req, res) => {
  // ID:llä
  console.log('DELETE');
  console.log(req.params.id);
  var id = { '_id': new ObjectId(encodeURIComponent(req.params.id)) };
  db.collection(MATERIAL_COLLECTION).remove(id, (err, result) => {
    if (result) {
        console.log('Poistettu');
    }
    res.json(result);
  });
});

var server = app.listen(PORT, () => {
    var port = server.address().port;
	var host = server.address().address;
    console.log("Kuunnellaan %s:%s", host, port);
  });