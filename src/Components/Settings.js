import React, { useState, useEffect } from "react";
import axios from "axios";

const Settings = (props) => {
	// const [data, setData] = useState();
	const [formValues, setFormValues] = useState({
		titles: "Fido approved",
	});

	// useEffect(() => {
	// 	axios
	// 		.get("http://test-site.local/wp-json/wpfa/v1/settings")
	// 		.then(function (response) {
	// 			// handle success
	// 			console.log(response.data);
	// 		});
	// }, []);

	const handleFormChange = (event) => {
		setFormValues(
			Object.assign(formValues, { [event.target.name]: event.target.value })
		);
		console.log(formValues);
	};

	const onSubmit = () => {
		console.log(formValues);
		// debugger;
		axios
			.post("/wp-json/wpfa/v1/settings", formValues)
			.then(function (response) {
				console.log(response);
				alert("form saved");
			})
			.catch(function (error) {
				console.log(error);
			});
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
						</tbody>
					</table>
				</form>

				<p className="submit">
					<button
						//type="submit"
						className="button button-primary"
						onClick={onSubmit}
					>
						Save
					</button>
				</p>
			</div>
		</React.Fragment>
	);
};

export default Settings;
