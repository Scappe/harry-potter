var app = {
	init: function () {
		let origin = window.location.origin,
			pathname = window.location.pathname

		$.getJSON(`${origin}${pathname}?students.json`)
			.done(app.writeStudents)
			.fail(app.onFail)
	},

	onFail: error => console.log(`errore nella lettura del file json ${error}`),

	writeStudents: function (Student) { //return del model
		$("#students").append(
			Student.map(student =>
				`
				<li class="students">
					<div>
						Saedfa: <span>${student.name}, ${student.age}, ${student.house}</span>
					</div>
				</li>
				`
			).join('')
		)
	}
}


$(document).ready(app.init);