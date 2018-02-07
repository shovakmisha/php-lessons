<?php

  interface MediaPlayer{
      function play($type, $name);
  }

  interface SuperMediaPlayer{
      function playOgg($name);
      function playMp4($name);
  }

  class AudioPlayer implements MediaPlayer{
      function play($type, $name)
      {
          // TODO: Implement play() method.

          switch ($type){
              case "WAV": echo "Playing $name"; break;
              case "MP3": echo "Playing $name"; break;
              case "MP4": echo "Playing $name"; break;
          }

      }
  }

    class OggOlayer implements SuperMediaPlayer{
        function playOgg($name)
        {
            // TODO: Implement playOgg() method.

            echo "Plaing OGG $name";

        }

        function playMp4($name)
        {
            // TODO: Implement playMp4() method.
        }
    }

class Mp4Player implements SuperMediaPlayer{
    function playMp4($name)
    {
        // TODO: Implement playMp4() method.

        echo "Plaing Mp4 $name";

    }

    function playOgg($name)
    {
        // TODO: Implement playOgg() method.
    }
}



?>