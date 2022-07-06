import React, { useState, useEffect } from "react";
import axios from "axios";

const Settings = (props) => {
	const [formValues, setFormValues] = useState({});

	const handleFormChange = (event) => {
		setFormValues(
			Object.assign(formValues, { [event.target.name]: event.target.value })
		);
		console.log(formValues);
	};

	const onSubmit = (data) => {
		alert(data);

		// const requestOptions = {
		// 	method: "POST",
		// 	headers: { "Content-Type": "application/json" },
		// 	body: JSON.stringify(data),
		// };

		// fetch(
		// 	"http://testsite.local/wp-json/wpfa/v1/settings",
		// 	requestOptions
		// ).then((response) => response.json());
	};

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
									<label htmlFor="firstName">First Name</label>
								</th>
								<td>
									<input
										name="firstName"
										placeholder="First Name"
										type="text"
										onChange={handleFormChange}
									/>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label htmlFor="lastName">Last Name</label>
								</th>
								<td>
									<input
										name="lastName"
										placeholder="Last Name"
										type="text"
										onChange={handleFormChange}
									/>
								</td>
							</tr>
							<tr>
								<th scope="row">
									<label htmlFor="email">email</label>
								</th>
								<td>
									<input
										name="email"
										placeholder="Email"
										type="email"
										onChange={handleFormChange}
									/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" />
								</td>
							</tr>
						</tbody>
					</table>
				</form>

				{/* <p className="submit">
					<button
						//type="submit"
						className="button button-primary"
					>
						Save
					</button>
				</p> */}
			</div>
		</React.Fragment>
	);
};

export default Settings;
