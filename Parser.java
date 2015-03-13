import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
/**
 * This class is thread safe.
 */
public class Parser {
  private File file;
  public synchronized void setFile(File f) {
    file = f;
  }
  public synchronized File getFile() {
    return file;
  }
  public String getContent() throws IOException {
    FileInputStream fis = new FileInputStream(file);
    String output = "";
    int byteRead;
    while ((byteRead = fis.read()) > 0) {
      output += (char) byteRead;
    }
    return output;
  }
  public String getContentWithoutUnicode() throws IOException {
    FileInputStream fis = new FileInputStream(file);
    String output = "";
    int byteRead;
    while ((byteRead = fis.read()) > 0) {
      if (byteRead < 0x80) {
        output += (char) byteRead;
      }
    }
    return output;
  }
  public void saveContent(String content) throws IOException {
    FileOutputStream fos = new FileOutputStream(file);
    for (int i = 0; i < content.length(); i += 1) {
      o.write(content.charAt(i));
    }
  }
}
