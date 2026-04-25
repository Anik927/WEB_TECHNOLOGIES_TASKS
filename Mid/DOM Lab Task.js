document.getElementById('student-form').addEventListener('submit', addStudent);
document.getElementById('student-name').addEventListener('input', checkInput);
document.getElementById('search-box').addEventListener('input', searchStudent);
document.getElementById('sort-btn').addEventListener('click', sortStudents);

let highlightButton = document.createElement('button');
highlightButton.textContent = 'Highlight First Student';
highlightButton.classList.add('highlight-btn'); 
document.body.appendChild(highlightButton);
document.body.insertBefore(highlightButton, document.getElementById('sort-btn'));

highlightButton.addEventListener('click', function() {
    let students = document.querySelectorAll('.student-item');

    students.forEach(student => {
        student.classList.remove('highlight');
        student.style.border = ''; 
    });

    
    if(students.length > 0) {
        students[0].classList.add('highlight');
         
    }
});

function addStudent(event) {

 event.preventDefault(); // Prevent page reload

 let studentRoll = document.getElementById('student-roll').value;
 let studentName = document.getElementById('student-name').value;

 let li = document.createElement("li");
 li.classList.add('student-item'); 

 let name = document.createElement('name');
 name.textContent = studentName;

 // Present checkbox
 let presentCheckbox = document.createElement('input');
 presentCheckbox.type = 'checkbox';
 presentCheckbox.classList.add('present-checkbox');

 // label next to it
 let label = document.createElement('label');
 label.textContent = ' Present';

 li.appendChild(name);
 li.appendChild(presentCheckbox);
 li.appendChild(label);
 
 presentCheckbox.addEventListener('change', function(){
  
  if(presentCheckbox.checked){
    li.style.backgroundColor = 'lightgreen'; 
  } else {
    li.style.backgroundColor = ''; 
  }
  
  
  updateAttendance(); 
});

let deleteButton = document.createElement('button');
deleteButton.textContent = 'Delete';
deleteButton.classList.add('delete-btn');

deleteButton.addEventListener('click', function() {
  let isConfirmed = confirm("Are you sure you want to delete this student?");
  if (isConfirmed) {
      li.remove(); // remove the <li> from DOM
      updateStudentCount(); // update total students
      updateAttendance();   // update present/absent counts
    }
  });
    
  li.appendChild(deleteButton); // then append the button

 document.getElementById("student-list").appendChild(li);

 updateStudentCount();
 updateAttendance();

}

function sortStudents(){

 let list = document.getElementById('student-list');

 let students = Array.from(list.children);

 students.sort((a, b) => {

  let nameA = a.querySelector('name').textContent.toLowerCase();
  let nameB = b.querySelector('name').textContent.toLowerCase();

  return nameA.localeCompare(nameB);

 });

 students.forEach(student => list.appendChild(student));

 updateStudentCount();
 updateAttendance();

}

function updateAttendance(){

  let students = document.querySelectorAll('.student-item');

  let present = 0;
  let absent = 0;

  students.forEach(student => {
    let checkbox = student.querySelector('.present-checkbox');
    if(checkbox.checked){
      present++;
    } else {
      absent++;
    }
  });

  document.getElementById('attendance-count').textContent =
  `Present: ${present}, Absent: ${absent}`;
}

function searchStudent(){

 let searchText =
 document.getElementById('search-box').value.toLowerCase();

 let students =
 document.querySelectorAll('.student-item');

 students.forEach(student => {

  let text = student.textContent.toLowerCase();

  if(text.includes(searchText)){
   student.style.display = '';
  }
  else{
   student.style.display = 'none';
  }

 });

}


function checkInput(){

 let name = document.getElementById('student-name').value;
 let button = document.getElementById('add-btn');

 if(name.trim() === ''){
  button.disabled = true;
 }
 else{
  button.disabled = false;
 }

}

function updateStudentCount() {

    let students = document.querySelectorAll('.student-item');

    document.getElementById('student-count').textContent =
    "Total students: " + students.length;

}