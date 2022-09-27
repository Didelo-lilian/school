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
	* Creates a new HttpClient that connects to svrName through svrPort
	*
	* @param svrName. The server name or IP address in String
	* @param svrPort. The server port (int).
	**/
	public HttpClient(String svrName, int svrPort) {
		this.svrName = svrName;
		this.svrPort = svrPort;
	}

	/**
	* Creates a new request.
	*
	* @param method. The method (e.g. GET), in String
	* @param path. The URI
	**/
	public void createReq(String method, String path) {
		httpHeader = "";
		httpBody = "";
		httpHeader = method + " " + path + " HTTP/1.1\r\n" + "Host: " + svrName + "\r\n";
	}

	/**
	* Add a line to the HTTP request header.
	*
	* @param headerLine. The line to add to the HTTP header. headerLine must not contains a "\n" or "\r\n".
	**/
	public void addHeaderLine(String headerLine) {
		httpHeader += headerLine + "\r\n";
	}

	/**
	* Add a line to the HTTP request body. The body will be built in URL format.
	*
	* @param bodyData. The line to add to the HTTP body. bodyLine must not contains a "&".
	**/
	public void addBodyData(String bodyData) {
		if (!httpBody.isEmpty())
			httpBody += "&";
		httpBody = httpBody + bodyData;
	}

	/**
	* Print the full request to be sent. This is just for debugging purposes and is a private method
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
	* send the created request and closes the connection. In all cases, sendRequest() clears the current request.
	* 
	* @return A String array. Position zero will cotain the HTTP header reply. Position 1 will contain the HTTP body reply (if any)
	**/
	public String[] sendRequest() {
		String[] res = new String[2];
		res[0] = "";
		res[1] = "";

		if(!httpBody.isEmpty()){
			int len = httpBody.getBytes().length;
			httpHeader = httpHeader + "Content-Length: " + len + "\r\n";
		}

		showFullRequest();

		try (Socket s = new Socket(svrName, svrPort)) {

			PrintWriter out = new PrintWriter(s.getOutputStream(), true);
			InputStream in = s.getInputStream();

			out.print(httpHeader + "\r\n" + httpBody);
			httpHeader = "";
			httpBody = "";

			out.flush();

			String line;
			int cnt = 0;
			while ((line = myreadline(in)) != null) {
				res[cnt] = res[cnt] + line + "\n";
				if (line.isEmpty() && cnt == 0) cnt++;
			}

			out.close();
			in.close();
			s.close();

		} catch (UnknownHostException ex) {
			System.out.println("Server not found: " + ex.getMessage());
		} catch (IOException ex) {
			System.out.println("I/O error: " + ex.getMessage());
		}
		return res;
	}

	public static void main(String[] args) {
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
	}
}
