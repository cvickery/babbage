// JavaScript Document
var   iTunesApp = WScript.CreateObject("iTunes.Application");
var   mainLibrary = iTunesApp.LibraryPlaylist;
var   tracks = mainLibrary.Tracks;
var   numTracks = mainLibrary.Tracks.Count;

var   isCscript=/.*cscript.*/.test(WScript.FullName);
var   numVideos = 0;

WScript.echo("There are\n    " + numTracks + " tracks in your iTunes library.");

  for (var i = 1; i <= numTracks; i++)
  {
    var   currTrack = tracks.Item(i);
    if (currTrack.VideoKind != 0)
    {
      numVideos++;
      if (isCscript)
      {
        if (currTrack.Artist != "")
        {
          WScript.echo(currTrack.Name + "\n    by " + currTrack.Artist);
        }
        else
        {
          WScript.echo(currTrack.Name);
        }
      }
    }
  }
  WScript.echo( "There are " + numVideos + " videos." );

