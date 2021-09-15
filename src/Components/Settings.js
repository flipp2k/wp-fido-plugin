import React, { useState, useEffect } from "react";
import axios from "axios";

const Settings = () => {
	return (
		<React.Fragment>
			<div>
				<h2>Fido Awards Settings</h2>
			</div>
			<div id="fido-setting-form" className="wrap">
				<form id="fido-award-settings-form">
					<table className="form-table" role="presentation">
						<tbody>
							<tr>
								<th scope="row">
									<label htmlFor="firstName">FirstName</label>
								</th>
								<td>
									<input
										id="firstName"
										name="firstName"
										value=""
										className="regular-text"
										onChange={""}
									/>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label htmlFor="lastName">lastName</label>
								</th>
								<td>
									<input
										id="lastName"
										name="lastName"
										value=""
										className="regular-text"
										onChange={""}
									/>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label htmlFor="email">email</label>
								</th>
								<td>
									<input
										id="email"
										name="email"
										value=""
										className="regular-text"
										onChange={""}
									/>
								</td>
							</tr>
						</tbody>
					</table>
				</form>

				<p className="submit">
					<button type="submit" className="button button-primary">
						Save
					</button>
				</p>
			</div>
		</React.Fragment>
	);
};

export default Settings;
