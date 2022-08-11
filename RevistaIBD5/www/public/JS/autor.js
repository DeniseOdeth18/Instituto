

const URL = "http://localhost:8888/RevistaIBD5/www/api/autor";

async function getAllAutor() {

    return resp = await fetch(  URL + "/read.php",{
        method: 'GET',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        } 
    });
}

async function insertAutor( Nombres, ApellidoP, ApellidoM){

    const DATA = {
       "Nombres:": "Denise",
        "ApellidoP": "Holi", 
       " ApellidoM" : "Odeth"
   
    }
  

    return resp = await fetch( URL + "/create.php",{
        method: 'POST',
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body:JSON.stringify(DATA)
    });



}
