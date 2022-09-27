import java.net.*;
import java.io.*;

/**
* This class is able to build a request, send it, and give back the answer
* This class uses the HTTP/1.1 protocol.
*/
public class HttpClient2 {

	private String svrName;
	private int svrPort;
	private String httpHeader = "";
	private String httpBody = "";

	/**
	* Creates a new HttpClient that will connect to svrName through svrPort
	*
	* @param svrName. The server name or IP address in String
	* @param svrPort. The server port (int).
	**/
	public HttpClient2(String svrName, int svrPort) {
		this.svrName = svrName;
		this.svrPort = svrPort;
	}

	/**
	* createReq() creates the first line of a new request, and append
	* the "Host" HTTP option to create a new 
	* Ex. GET /index.php?var1=val1&var2=val2 HTTP/1.1
	* This first line must be added to the "httpHeader" class attribute
	* This method will add the CRLF characters at the end of the line!
	*
	* @param method. The method (e.g. GET), in String
	* @param path. The URI
	**/
	public void createReq(String method, String path) {
		this.httpHeader = method + path + "Http/1.1\r\n"+"Host:"+this.svrName+"\r\n" ;
	}

	/**
	* Add a line to the HTTP request header (i.e. a HTTP option field).
	* Ex. Content-Type: application/x-www-form-urlencoded
	* This method will add the CRLF characters at the end of the option.
	*
	* @param headerLine. The line to add to the HTTP header. "headerLine" must not contains the CRLF characters.
	**/
	public void addHeaderLine(String headerLine) {
		this.httpHeader += headerLine + "\r\n";
	}

	/**
	* Add the bodyData string to the HTTP request body. addBodyData()
	* can be called multiple times. At every call, the new bodyData
	* is concatenated at the end of the "httpBody" class attribute.
	*
	* @param bodyData. The data to add to the HTTP body. bodyData must not contains a "&".
	**/
	
	public void addBodyData(String bodyData) {		
			if(!httpBody.isEmpty()){
				this.httpBody += '&';
			}
			this.httpBody += bodyData + "\r\n";
		}

	/**
	* Print the full request to be sent. This is just for debugging purposes.
	**/
	private void showFullRequest() {
		System.out.println("=== Req to Send ===");
		System.out.println(httpHeader + "\r\n" + httpBody);
	}

	/**
	* Helper to read a line from an InputStream.
	* 
	**/
	private String myreadline(InputStream is) throws IOException {
		char c = 0;
		int len = 0;
		String s = "";
		do {
			len = is.read();
			// did the remote peer close the connexion?
			if (len == -1) {
				if (s.isEmpty()) return null;
				else return s;
			}
			c = (char) len;
			// is it the end of the line?
			if (c == '\n') break;
			// CR is not a line end
			if (c == '\r') continue;
			s += c; 
		} while (c != -1);
		return s;
	}
	/**
	* Actually send the created request and closes the connection.
	* This method will add the "Content-Length" option iff there is
	* a body for the request to send.
	* In all cases, sendRequest() erases the current request before
	* leaving this method.
	* 
	* @return A String array. Index zero will cotain the
	* HTTP header reply. Index 1 will contain the HTTP body reply
	* (if any)
	**/
	public String[] sendRequest() {
		String[] res;	
		res = new String[2]	;
		// TODO
		// feel free to inspire from the p85 of the slides of our course
		// To get the number of bytes in a String s, you can do
		// int lenBytes = s.getBytes("UTF-8").length
		try (Socket socket = new Socket(svrName,svrPort)) {
			OutputStream output = socket.getOutputStream();
			PrintWriter writer = new PrintWriter(output);

			if(!this.httpBody.isEmpty()){
				this.addHeaderLine("Content-Length: "+ this.httpBody.getBytes("UTF-8").length);
			}

			writer.print(this.httpHeader+"\r\n"+this.httpBody);
			writer.flush();
			InputStream input = socket.getInputStream();
			String Line ;

			int index = 0;
			res[0]="";
			res[1]="";
			this.httpHeader="";
			this.httpBody="";

			while ((Line=myreadline(input)) != null) {
				if(Line.isEmpty()){
					index = 1 ;
					continue ;
				}
				res[index] += myreadline(input) + "\r\n";
				
				}
			}
		catch (UnknownHostException ex) {
			System.out.println("Server not found: " + ex.getMessage());
		} catch (IOException ex) {
			System.out.println("I/O error: " + ex.getMessage());
		}
		return res;
	}

	public static void main(String[] args) {
		// Demo to show how the HttpClient is expected to work
		String[] reply;
		HttpClient2 hc = new HttpClient2("www.i3s.unice.fr",80);
		/*hc.createReq("GET","/");
		hc.addHeaderLine("Connection: close");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);*/
		
		hc.createReq("GET","/~lopezpac/");
		hc.addHeaderLine("Connection: close");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);
		
		
		/*hc = new HttpClient2("httpbin.org",80);
		hc.createReq("GET","/get?var1=val1&var2=val2");
		hc.addHeaderLine("Connection: close");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);
		hc.createReq("POST","/post?var1=val1&var2=val2");
		hc.addHeaderLine("Connection: close");
		hc.addHeaderLine("Content-Type: application/x-www-form-urlencoded");
		hc.addBodyData("var3=val3");
		hc.addBodyData("var4=val4");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);
		*/
		
	}
}