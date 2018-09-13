<script>
var songlist = ['song1', 'song2', 'song3'];

var sendData = function() {
  $.post('new.php', {
    data: songlist
  }, function(response) {
    console.log(response);
  });
}
sendData();
</script>
