import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { User } from 'src/app/model/User';
import { AuthService } from 'src/app/services/auth.service';
import { HttpService } from 'src/app/services/http.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {
  // atributos de la clase
  login: FormGroup;
  newUser: User;
  mensaje: string;

  constructor(private myHttpService:HttpService, private router: Router) {
    this.login = new FormGroup({
      nomUsuari: new FormControl('', [
        Validators.required,
        // Validators.pattern('^[a-zA-Z0-9 ]{6,}$'),    
      ]),
      contrasenya: new FormControl('', [
        Validators.required,
        // Validators.pattern('/^\d{8}[a-zA-Z]$/'),
      ]),
    });

    // Creamos el usuario vacio
    this.newUser = new User('', '');
    
    // Ponemos el mensaje en blanco
    this.mensaje = '';
  }

  enviament(): void {
    this.newUser = new User(
      this.login.value.nomUsuari,
      this.login.value.contrasenya
    );

    console.log(this.newUser);
    this.myHttpService.validateLogin(this.newUser.name,this.newUser.password).subscribe(
      result => {
        this.mensaje=result.message;
        
        window.location.href="http://localhost:4200";
      },
      error => {
        this.mensaje="Error: Credenciales incorrectas";
      }
     );

  }

  Enrere() {
    this.router.navigate(['/home']);
  }
}
