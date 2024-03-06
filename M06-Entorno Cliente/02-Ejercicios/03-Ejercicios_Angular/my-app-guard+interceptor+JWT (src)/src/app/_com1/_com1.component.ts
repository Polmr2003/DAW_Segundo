import { Component, OnInit } from '@angular/core';
import { HttpService } from '../services/http.service';
import { User } from '../model/User';
import { Router } from '@angular/router';
import { FormGroup, FormControl, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-com1',
  templateUrl: './_com1.component.html',
  styleUrls: ['./_com1.component.css']
})
export class Com1Component implements OnInit {

  message:string;


  public loginForm =this.formBuilder.group({

    usuari:['',[Validators.required, Validators.minLength(3), Validators.maxLength(20)]],
    contrasenya: ['',
      Validators.required]
  });

  constructor(private myHttpService: HttpService, private route: Router, private formBuilder:FormBuilder ) {

    this.message="";
    if(this.myHttpService.usuariData()){
      this.route.navigate(['/home']);
    }
  }

  ngOnInit(): void {

  }

  testLogin():void{
    //login
    let usuari:any=this.loginForm.value.usuari;
    let contrasenya:any=this.loginForm.value.contrasenya;

    this.myHttpService.validateLogin(usuari,contrasenya).subscribe(
      result => {
        if(result.error){
          this.message="Credencials incorrectes";
          this.loginForm.reset();
        }else{
          console.log("Usuari correcte");
          this.route.navigate(['/home']);
        }
      },
      error => {
        console.error('Error al obtener los eventos:', error);
      }
     );
  }





}
