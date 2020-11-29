//  PrintWindow.java

import java.awt.*;
import javax.swing.*;
import java.awt.print.*;

public class PrintWindow implements Printable
{
  private JPanel    voltagePanel;
  private Container thing;

  public PrintWindow( Container whatever )
  {
    thing = whatever;
  }

  public int print( Graphics g, PageFormat pf, int pageNum )
                                          throws PrinterException
  {
    if (pageNum > 0 ) return Printable.NO_SUCH_PAGE;

    Graphics2D gc = (Graphics2D) g ;
    gc.translate( pf.getImageableX(), pf.getImageableY() );
    Dimension s = new Dimension( (int)pf.getImageableWidth(),
                                 (int)pf.getImageableHeight());
    thing.paint( gc );
    return Printable.PAGE_EXISTS;
  }
}
