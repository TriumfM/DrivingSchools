export default {
  show: function (type, text) {
    var x = document.getElementById('snackbar')
    x.className = 'show ' + type
    x.innerHTML = text
    setTimeout(function () {
      x.className = x.className.replace('show', '')
    }, 3000)
  }
}
