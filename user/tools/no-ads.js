window.onload = function exampleFunction() {

    const linkExterno = document.querySelector('a[href^="https://www.freewebhostingarea.com"]');
    const divPai = linkExterno.parentNode;
    divPai.style.display = 'none';
};