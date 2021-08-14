import React from "react";
import ReactDOM from "react-dom";
import App from "./App";

document.addEventListener("DOMContentLoaded", function () {
	const element = document.getElementById("fido-admin-app");
	if (typeof element != "undefined" && element != null) {
		ReactDOM.render(<App />, document.getElementById("fido-admin-app"));
	}
});
