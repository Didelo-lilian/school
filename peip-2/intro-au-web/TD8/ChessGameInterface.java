import java.util.*;
import java.io.*;
import org.json.JSONArray;
import org.json.JSONObject;

public class ChessGameInterface {
	HashMap<String,String> hm;

	public ChessGameInterface() {
		hm = new HashMap<String,String>();
		hm.put("r","<td>&#9820;</td>");
		hm.put("n","<td>&#9822;</td>");
		hm.put("b","<td>&#9821;</td>");
		hm.put("k","<td>&#9818;</td>");
		hm.put("q","<td>&#9819;</td>");
		hm.put("p","<td>&#9823;</td>");
		hm.put("R","<td>&#9814;</td>");
		hm.put("N","<td>&#9816;</td>");
		hm.put("B","<td>&#9815;</td>");
		hm.put("K","<td>&#9812;</td>");
		hm.put("Q","<td>&#9813;</td>");
		hm.put("P","<td>&#9817;</td>");
	}

	/**
	* This is a helper method for createHtmlChessBoard.
	* This method take the FEN and creates an HTML table that represent the chess board
	*
	* @param fen. The FEN String
	*/
	private void printChessTable(String fen, PrintWriter pw) {
		String[] rows = fen.split("/");
		String caux = "";
		for (String row: rows) {
			pw.print("<tr>");
			char[] cars = row.toCharArray();
			for (char c: cars) {
				caux = Character.toString(c);
				if (hm.containsKey(caux)) {
					pw.print(hm.get(caux));
					continue;
				}
				int n = Integer.parseInt(caux);
				for (int i=0; i < n; i++) {
					pw.print("<td></td>");
				}
			}
			pw.println("</tr>");
		}
	}

	/**
	* This method will create an HTML file that will represent the chess board.
	* This method will write all constants needed by the HTML page: styles, header and footer
	* It will call printChessTable(), which will write the dynamic part.
	* 
	* @param fen. The FEN String.
	*/
	public void createHtmlChessBoard(String fen) {
		String header = "<html>\n <head>\n  <meta http-equiv=\"refresh\" content=\"2\"/><style type=\"text/css\">        .chess_board { border:1px solid #333; margin-left: 40px;}        .chess_board td {            background:#fff; background:-moz-linear-gradient(top, #fff, #eee);            box-shadow:inset 0 0 0 1px #fff;            -moz-box-shadow:inset 0 0 0 1px #fff;            -webkit-box-shadow:inset 0 0 0 1px #fff;            height:40px; text-align:center; vertical-align:middle; width:40px; font-size:30px;}        .chess_board tr:nth-child(odd) td:nth-child(even),        .chess_board tr:nth-child(even) td:nth-child(odd) {            background:#ccc; background:-moz-linear-gradient(top, #ccc, #eee);            box-shadow:inset 0 0 10px rgba(0,0,0,.4);            -moz-box-shadow:inset 0 0 10px rgba(0,0,0,.4);            -webkit-box-shadow:inset 0 0 10px rgba(0,0,0,.4); }        .horizontallabels td, .verticallabels td {          height:38px;text-align:center; vertical-align:middle; width:36px; font-size:29px;        }        .horizontallabels {          padding-left: 40px;        }        .verticallabels {          float:left; width:40px;        }    </style>    </head><body>  <table class=\"verticallabels\">    <tr><td>8<td></tr>    <tr><td>7<td></tr>    <tr><td>6<td></tr>    <tr><td>5<td></tr>    <tr><td>4<td></tr>    <tr><td>3<td></tr>    <tr><td>2<td></tr>    <tr><td>1<td></tr>  </table>  <table class=\"chess_board\" cellspacing=\"0\" cellpadding=\"0\">";
		String footer="</table><table class=\"horizontallabels\">      <tr>        <td>a</td>        <td>b</td>        <td>c</td>        <td>d</td>        <td>e</td>        <td>f</td>        <td>g</td>        <td>h</td>      </tr>    </table></body></html>";

		FileWriter fw = null;
		PrintWriter pw = null;
		try {
			fw = new FileWriter("/tmp/jeu.html");
			pw = new PrintWriter(fw);
			pw.println(header);
			if (fen == null || fen.isEmpty())
				printChessTable("8/8/8/8/8/8/8/8", pw);
			else
				printChessTable(fen.split(" ")[0], pw);
			pw.println(footer);
			pw.close();
			fw.close();
		} catch (IOException e) {
			System.out.println("Problems with file");
		}
	}
	
	/**
	* Private method to read a line from Stdin
	*/
	private static String getLineFromStdin() {
		String choice = "";
		BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
		try {
			choice = reader.readLine();
			return choice;
		} catch (IOException e) {
			e.printStackTrace();
		}
		return "exit";
	}

	/**
	* Main menu + interaction with the user
	* Does the user want to create a new chess game?
	*/
	public static String mainMenu() {
		System.out.print(" Welcome to the Chess Game !\n" + " Please type \"S\" to start playing or anything else to leave: ");
		return getLineFromStdin();
	}

	/**
	* Let's say to the user, he/she provided an illegal move
	*/
	public static void showBadMoveMessage() {
		System.out.println("Illegal Move! Please try again.\n");
	}

	/**
	* Let's ask if the user wants to provide a new piece movement or exit
	*/
	public static String playingMenu(String name) {
		System.out.print(" " + name + ", please enter your movement (e.g. a2a3) or \"exit\" to leave: ");
		return getLineFromStdin();
	}

	/**
	* Just a helper to parse a JSON Object. It gives the String value associated to a key.
	* The value we're looking for must be a String!
	*
	* @param json. The JSON Object in String format
	* @param jsonkey. The JSON key we are intested in.
	* 
	* @return the value associated to the key.
	*/
	public static String getValueFromKeyJSON(String json, String jsonkey) {
		JSONObject obj = new JSONObject(json);
		String jsonVal = obj.getString(jsonkey);

		return jsonVal;
	}
}