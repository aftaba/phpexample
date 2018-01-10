import { Component } from '@angular/core';
import {Http} from '@angular/http';
import 'rxjs/add/operator/map';
@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.css']
})
export class AddComponent  {
public id="";
public name ="";
public ph="";
public address="";


constructor(private http :Http) {
}

senddata()
{
  //this.students.push(this.id,this.name,this.ph,this.address);
  let flag=1;
  console.log(this.id);
  let mydata=JSON.stringify({id : this.id, name : this.name , phone :this.ph , address : this.address,flag:flag});
  this.http.post("http://localhost/test/index.php",mydata )
 
  .subscribe((data) => {
    });
  
}


}
