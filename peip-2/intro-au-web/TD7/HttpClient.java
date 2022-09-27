import java.net.*;
import java.io.*;

/**
* This class is able to build a request, send it, and give back the answer
* This class uses the HTTP/1.1 protocol.
*/
public class HttpClient {

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
	public HttpClient(String svrName, int svrPort) {
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
		// TODO
	}

	/**
	* Add a line to the HTTP request header (i.e. a HTTP option field).
	* Ex. Content-Type: application/x-www-form-urlencoded
	* This method will add the CRLF characters at the end of the option.
	*
	* @param headerLine. The line to add to the HTTP header. "headerLine" must not contains the CRLF characters.
	**/
	public void addHeaderLine(String headerLine) {
		// TODO
	}

	/**
	* Add the bodyData string to the HTTP request body. addBodyData()
	* can be called multiple times. At every call, the new bodyData
	* is concatenated at the end of the "httpBody" class attribute.
	*
	* @param bodyData. The data to add to the HTTP body. bodyData must not contains a "&".
	**/
	public void addBodyData(String bodyData) {
		// TODO
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
		// TODO
		// feel free to inspire from the p85 of the slides of our course
		// To get the number of bytes in a String s, you can do
		// int lenBytes = s.getBytes("UTF-8").length
		try (Socket socket = ...) {
		// ...
		} catch (UnknownHostException ex) {
			System.out.println("Server not found: " + ex.getMessage());
		} catch (IOException ex) {
			System.out.println("I/O error: " + ex.getMessage());
		}
		return res;
	}

	public static void main(String[] args) {
		// Demo to show how the HttpClient is expected to work
		String[] reply;
		HttpClient hc = new HttpClient("www.i3s.unice.fr",80);
		hc.createReq("GET","/");
		hc.addHeaderLine("Connection: close");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);
		/*
		hc.createReq("GET","/~lopezpac/");
		hc.addHeaderLine("Connection: close");
		reply = hc.sendRequest();
		System.out.print("Header:\n" + reply[0]);
		System.out.println("Body:\n" + reply[1]);
		*/
		/*
		hc = new HttpClient("httpbin.org",80);
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