  function ssswitch(which)
  {
    for (var i = 0; i < document.styleSheets.length; i++)
    {
      document.styleSheets[i].disabled = true;
    }
    document.styleSheets[which].disabled = false;
  }
  ssswitch(0);
