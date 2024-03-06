import { Component, OnInit } from '@angular/core';
import { HttpService } from '../services/http.service';
import { User } from '../model/User';

@Component({
  selector: 'app-com2',
  templateUrl: './_com2.component.html',
  styleUrls: ['./_com2.component.css']
})
export class Com2Component implements OnInit {

  users!:User[];
  message!:string;
  constructor(private myHttpService: HttpService) { }

  ngOnInit(): void {

    this.myHttpService.getUsers().subscribe(
      result => {
        console.log(result);
        if(!result.error){
          this.users=result.data;
          console.log(this.users);
          this.message="";
        }else{
            this.message=result.data;
        }
      },
      error => {
        console.error('Error al obtener los eventos:', error);
      }
    );
  }

}
