import { Component } from '@angular/core';
import {Http} from '@angular/http';
import 'rxjs/add/operator/map';
@Component({
  selector: 'app-fetch',
  templateUrl: './fetch.component.html',
  styleUrls: ['./fetch.component.css']
})
export class FetchComponent  {
  public id="";
  public name ="";
  public ph="";
  public address="";
  public students=[];
  public flag='';
  public show =false;
  public updateShow=false;
  constructor(private http:Http){
    this.http.get("http://localhost/test/index.php")
    .map(res =>res.json())
    .subscribe((data) =>{
     this.students=data;
    });
}

  delete(id){
    console.log(id);
   // console.log(event.returnValue);
   let flag=2;
    let mydata=JSON.stringify({'id':id, 'flag':flag})
    if(flag==2){this.http.post("http://localhost/test/index.php",mydata )
    .subscribe((data) => {
      });}
 
}
  

update(id)
{

    this.show=true;
    //console.log(id);
    console.log(this.show);
   // console.log(this.students[0]);
    let i=0;
    while( this.students.length>0){
        if(this.students[i].id==id){
        console.log(this.students[i].id);
          this.id=this.students[i].id;
          this.name=this.students[i].name;
          this.ph=this.students[i].phone;
          this.address=this.students[i].address;

        break;
        
        }
        i++;

    }


}
updatedata(id){
  console.log(this.id);
  let flag=3;
 // this.id;
 this.updateShow=true;
  let mydata=JSON.stringify({id : this.id, name : this.name , phone :this.ph , address : this.address,flag : flag});
  this.http.post("http://localhost/test/index.php", mydata )
  .subscribe((data) => {
    });
    this.show=false;
}
}
