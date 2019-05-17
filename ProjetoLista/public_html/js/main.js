/* ==========================================================================
   Author's custom functions
   ========================================================================== */
    

/* ==========================================================================
    
   ========================================================================== */
var firebaseConfig = {
  apiKey: "AIzaSyBPnPYzUfwlSok41kE5wR1iUMSxevfd4m4",
  authDomain: "listamercado-3e885.firebaseapp.com",
  databaseURL: "https://listamercado-3e885.firebaseio.com",
  projectId: "listamercado-3e885",
  storageBucket: "listamercado-3e885.appspot.com",
  messagingSenderId: "228305721122",
  appId: "1:228305721122:web:b25860854535a9c9"
};
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  //var database = firebase.database();

  /**  metodo update 
  **/ 
  firebase.database().ref('Produtos').push('Arroz');
  /** metodo remove 
   *     firebase.database().ref('Produtos/-LetbBtMXJUL0l2-tSQj').set(null);
   * **/

  /**metodo get real time

var h1 = document.getElementById('h1');
var bdRef = firebase.database().ref().child('lista/item/cidade');
bdRef.on('value',snap => h1.innerHTML = snap.val());
console.log(h1);
**/

/**  metodo update 
**/
/**gravar listas
var data = {cidade:'sls',estado:'rs',pais:'br'}
var lista = firebase.database().ref('Produtos').push();
lista.set(data);
**/

/**ler listas ok 
**/
var database = firebase.database().ref('Produtos');
database.on('value',function (snap) {
    $('#ul').html('');
  snap.forEach(function(childSnap){
    $('#ul').append("<li>"+(childSnap.val())+" <button class=btn id="+(childSnap.key)+"> OK </button></li><hr>");
    console.log(childSnap.key);
  });
    $('button').bind("click",function(){
       firebase.database().ref('Produtos/'+this.id).set(null); 
    });
});






