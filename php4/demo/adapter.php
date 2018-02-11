<?php

  interface MediaPlayer{
      function play($type, $name);
  }
//  Це старий плеєр, який приймає 2 формати. Мені треба дописати до ньго новий функціонал.
  //class AudioPlayer implements MediaPlayer{
  //  function play($type, $name)
  //  {
  //      // TODO: Implement play() method.
  //      switch ($type){
  //          case "WAV": echo "Playing $name"; break;
  //          case "MP3": echo "Playing $name"; break;
  //      }
  //  }
  //}

  interface SuperMediaPlayer{
      function playOgg($name);
      function playMp4($name);
  }



    class OggPlayer implements SuperMediaPlayer{
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
// Моделірую ситуацію коли MediaPlayer застарілий і треба щоб у нього був функціонал як у більш нового SuperMediaPlayer
    class MediaAdapter implements MediaPlayer{
      private $superMediaPlayer;
      function __construct($type)
      {
          switch ($type){
              case "OOG": $this->superMediaPlayer = new OggPlayer; break;
              case "MP4": $this->superMediaPlayer = new Mp4Player; break;
          }
      }
      function play($type, $name)
      {
          // TODO: Implement play() method.

          switch ($type){
              case "OOG": $this->superMediaPlayer->playOgg($name); break;
              case "MP4": $this->superMediaPlayer->playMp4($name); break;
          }
      }
    }

// Новий ф-ціонал для AudioPlayer

class AudioPlayer implements MediaPlayer{
    private $MediaAdapter;
    function play($type, $name)
    {
        // TODO: Implement play() method.

        switch ($type){
            case "WAV": echo "Playing $name"; break;
            case "MP3": echo "Playing $name"; break;
            case "MP4":
            case "OOG" :
            $MediaAdapter = new MediaAdapter($type);
            $MediaAdapter->play($type, $name);
        }
    }
}

$p = new AudioPlayer;

$p->play("WAV", "Song1");
$p->play("MP3", "Song2");
$p->play("MP4", "Song3");
$p->play("OOG", "Song4");




































?>