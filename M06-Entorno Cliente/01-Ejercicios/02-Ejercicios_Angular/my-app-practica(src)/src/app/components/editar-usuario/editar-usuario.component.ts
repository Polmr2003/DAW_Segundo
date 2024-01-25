import { Component, Input, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { User } from 'src/app/model/User';
import { UsuariosService } from 'src/app/services/usuarios.service';

@Component({
  selector: 'app-editar-usuario',
  templateUrl: './editar-usuario.component.html',
  styleUrls: ['./editar-usuario.component.css']
})
export class EditarUsuarioComponent {
  @Input() usuario!: User;
  mensaje!: string;
  login: FormGroup;

  Usuario_edit!:User;
  
  constructor(private UsuarioService: UsuariosService ) {
    this.login = new FormGroup({
      nomUsuari: new FormControl('', [
        Validators.required,
        Validators.pattern('^[a-zA-Z0-9 ]{6,}$')
      ]),
      contrasenya: new FormControl('', [
        Validators.required,
        Validators.pattern(/^(?=.*[a-zA-Z])(?=.*\d).{4,}$/),
      ]),
    });
  }

  enviament(): void {
    this.Usuario_edit = new User(
      this.login.value.nomUsuari,
      this.login.value.contrasenya,
    );

    this.UsuarioService.ModificarUsuario(this.usuario, this.Usuario_edit);
    
  }
}
