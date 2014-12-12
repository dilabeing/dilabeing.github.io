window.addEventListener('DOMContentLoaded', function (){
	var newNoteBtn = document.getElementById('newNote');
	var viewAllBtn = document.getElementById('viewAll');
	var manageBtn = document.getElementById('manageNotes');
	var noteKeys = getNoteDB();
	var totalNote = checkTotalNote();

	document.getElementById('totalNote').innerHTML = totalNote;

	viewAllBtn.addEventListener('click', function (){
		var targetA = document.getElementById('targetA');
		targetA.innerHTML="";

		var noteKeys = localStorage.noteKeys;
		noteKeys.forEach(function (note){
			var p = document.createElement('p');
			p.textContent = note;
			targetA.appendChild(p);
		});});

	newNoteBtn.addEventListener('click', function(){

		var targetA = document.getElementById('targetA');
		targetA.innerHTML="";
		var addNewNoteInput = document.createElement('input');
		var addNewNoteBtn = document.createElement('button');

		addNewNoteBtn.innerHTML = 'Add Note';
		addNewNoteBtn.addEventListener('click', addNewNote);

		targetA.appendChild(addNewNoteInput);
		targetA.appendChild(addNewNoteBtn);
	})

	function getNoteDB(){
		if (localStorage.noteKeys){
			return JSON.parse(localStorage.noteKeys);
		} else return [];
	}

	function addNewNote(){
		var textInput = document.getElementsByTagName('input')[0];
		var currentCount = "note" + checkCurrentCount();
		
		console.log("The currentCount " + currentCount);
		console.log("The textInput " + textInput.value);
		localStorage.setItem(currentCount, textInput.value);
		localStorage.setItem("currentCount", checkCurrentCount + 1);
		noteKeys.push(currentCount);
		localStorage.setItem("noteKeys", JSON.stringify(noteKeys));
		console.log(localStorage.currentCount);

		textInput.value = "";
		textInput.focus();

	}

	function checkTotalNote(){
		if(localStorage.totalNote)
			return localStorage.totalNote;
		else {
			localStorage.setItem("totalNote", 0);
			return 0;}
	}

	function checkCurrentCount(){
		if(localStorage.currentCount){
			return localStorage.currentCount;
		}
		else{
			localStorage.setItem("currentCount", 1);
			return 1;
		}
	}


})