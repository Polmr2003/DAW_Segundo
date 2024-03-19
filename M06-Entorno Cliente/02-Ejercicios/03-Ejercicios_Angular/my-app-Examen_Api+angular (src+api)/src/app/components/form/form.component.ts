import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { User } from 'src/app/model/User';
import { HttpService } from 'src/app/services/http.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css'],
})
export class FormComponent {
    //propietats de la classe
    formulari: FormGroup;
    newUser: User;
    mensaje: string;

    constructor(private router: Router, private myHttpService:HttpService) {
      this.formulari = new FormGroup({
        nomUsuari: new FormControl('', [
          Validators.required,
          // Validators.pattern('^[a-zA-Z]{6,}$')
        ]),
        contrasenya: new FormControl('', [
          Validators.required,
          //(?=.*[a-zA-Z]): Asegura que haya al menos una letra en la cadena , si queremos que sean 2 letra tenemos que poner otro .*[a-zA-Z] || (?=.*\d): Asegura que haya al menos un número en la cadena, si queremos que sean 2 numeros tenemos que poner otro .*\d
          Validators.pattern(/^(?=.*[a-zA-Z])(?=.*\d).{8,}$/),
        ]),
        confirmarContrasenya: new FormControl('', [Validators.required]),
      });
      this.newUser = new User('', '');
      this.mensaje="";
    }
  
    enviament(): void {
      this.newUser = new User(
        this.formulari.value.nomUsuari,
        this.formulari.value.contrasenya
      );

      console.log(this.newUser);
      this.myHttpService.Register(this.newUser.name,this.newUser.password).subscribe(
        result => {
          this.mensaje=result.message;
          
          window.location.href="http://localhost:4200";
        },
        error => {
          this.mensaje="Error: no se a insertado el usuario";
        }
       );

    }

    Enrere() {
      this.router.navigate(['/home']);
    }
}
