      //search table by name
      function searchByName(){
        var name= document.getElementById("name").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             document.getElementById("studentTableBody").innerHTML = this.responseText;
          }
        }
        xhttp.open("POST", "logic/get_table_by_name.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name="+name);
       
      }
      // search table by gender and jamb score
      function searchByGenderAndJScore(){
        var gender = document.getElementById("gender").value;
        var score = document.getElementById("score").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             document.getElementById("studentTableBody").innerHTML =this.responseText;
          }
        }
        xhttp.open("POST", "logic/get_table_by_gender_score.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("gender="+gender+"&score="+score);
      }
      // search table by admission status
      function searchByAdmissionStatus(){
        var admissionStatus = document.getElementById("admissionStatus").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
             document.getElementById("studentTableBody").innerHTML =this.responseText;
          }
        }
        xhttp.open("POST", "logic/get_table_by_admission_status.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("admissionStatus="+admissionStatus);
      }

      // get approval by checkbox
      function getApproval(id){
        var approval= document.getElementById("approval");
        if (approval.checked) {
          var approval= document.getElementById("approval").value;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if (this.responseText == "yes") {
                location.reload();
              }
            }
          }
          xhttp.open("POST", "logic/get_approval.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("approval="+approval+"&id="+id);
        }else if(approval.checked == false){
          approval ="off";
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if (this.responseText=="no") {
                location.reload();
              }
            }
          }
          xhttp.open("POST", "logic/get_approval.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("approval="+approval+"&id="+id); 
        }        
      }

      const checkerStatus = (currentAdmissionStatus) => {
        const approval = document.getElementById('approval');
        if(currentAdmissionStatus == 'admitted') {
          approval.checked = true;
        }
        if (currentAdmissionStatus == 'undecided') {
          approval.checked = false;
        }
      }

      const dateFormater = (date) => {
        const dateHolder = document.getElementById('date');
        const months = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const day = new Date(date).getDate();
        const month = new Date(date).getMonth();
        const year = new Date(date).getFullYear();

        dateHolder.innerHTML = `${months[month]} ${day} ${year}`;
      }

      