(function () {
    "use strict";

window.addEventListener('load', init);

function init(){

    let adamElm = document.getElementById("AdamPic");
    let aidenElm = document.getElementById("AidenPic");
    let alexElm = document.getElementById("AlexPic");
    let mattElm = document.getElementById("MattPic");

    const adamBio = document.getElementById("aj");
    const aidenBio = document.getElementById("aw");
    const alexBio = document.getElementById("af");
    const mattBio = document.getElementById("ms");

    adamBio.classList.add("hidden");
    aidenBio.classList.add("hidden");
    alexBio.classList.add("hidden");
    mattBio.classList.add("hidden");

    adamElm.addEventListener('click', adam);
    aidenElm.addEventListener('click', aiden);
    alexElm.addEventListener('click', alex);
    mattElm.addEventListener('click', matt);

    adamElm.addEventListener('mouseover', adam);
    aidenElm.addEventListener('mouseover', aiden);
    alexElm.addEventListener('mouseover', alex);
    mattElm.addEventListener('mouseover', matt);
}

function adam(){

    id("aj").classList.remove("hidden");
    id("aw").classList.add("hidden");
    id("af").classList.add("hidden");
    id("ms").classList.add("hidden");
    
}

function aiden(){
    id("aj").classList.add("hidden");
    id("aw").classList.remove("hidden");
    id("af").classList.add("hidden");
    id("ms").classList.add("hidden");
}

function alex(){
    id("aj").classList.add("hidden");
    id("aw").classList.add("hidden");
    id("af").classList.remove("hidden");
    id("ms").classList.add("hidden");
}

function matt(){
    id("aj").classList.add("hidden");
    id("aw").classList.add("hidden");
    id("af").classList.add("hidden");
    id("ms").classList.remove("hidden");
}

 /* ------------------------------ Helper Functions  ------------------------------ */

  /**
   * Helper function to return the response's result text if successful, otherwise
   * returns the rejected Promise result with an error status and corresponding text
   * @param {object} response - response to check for success/error
   * @returns {object} - valid result text if response was successful, otherwise rejected
   *                     Promise result
   */
   function checkStatus(response) {
    if (response.ok) {
      return response.json();
    } else {
      return Promise.reject(new Error(response.status + ": " + response.statusText));
    }
  }

  /**
   * Returns the element that has the ID attribute with the specified value.
   * @param {string} idName - element ID
   * @returns {object} DOM object associated with id.
   */
  function id(idName) {
    return document.getElementById(idName);
  }

  /**
   * Returns the first element that matches the given CSS selector.
   * @param {string} query - CSS query selector.
   * @returns {object} The first DOM object matching the query.
   */
  function qs(query) {
    return document.querySelector(query);
  }

  /**
   * Returns the array of elements that match the given CSS selector.
   * @param {string} query - CSS query selector
   * @returns {object[]} array of DOM objects matching the query.
   */
  function qsa(query) {
    return document.querySelectorAll(query);
  }

})();