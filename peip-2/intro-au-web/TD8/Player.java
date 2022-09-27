public abstract class Player {
	protected String gameId;
	protected String playerName;
	protected HttpClient restClient;

	/**
	* This method will implement anything to actually move a piece of the player
	* It's expected to execute a request to the server to move a piece.
	*
	* @return an int which will represent the execution code. Of course, 0 will mean success in moving the piece
	*/
	public abstract int move();

	/**
	* Sets the player name.
	*
	* @param playerName. The player name in String
	*/
	public void setPlayerName(String playerName) {
		this.playerName = playerName;
	}

	/**
	* Method to obtain the player name (String)
	*/
	public String getPlayerName() {
		return playerName;
	}

	/**
	* Update the game id of the player
	*
	* @param gameId. The new game id (String)
	*/
	public void setGameId(String gameId) {
		this.gameId = gameId;
	}
}