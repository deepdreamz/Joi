 <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
var request = new XMLHttpRequest();

request.open('GET', 'http://localhost/joi/php_rest_api/api/languages/read.php', true);
request.onload = function () {

  // Begin accessing JSON data here
  var data = JSON.parse(this.response);

  if (request.status >= 200 && request.status < 400) {
    data.forEach(lang => {
      console.log(lang.language);
    });
  } else {
    console.log('error');
  }
}

request.send();
</script>