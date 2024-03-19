import { Injectable } from '@angular/core';
import { User } from '../model/User';

@Injectable({
  providedIn: 'root',
})
export class UsuariosService {
  logeado!: Boolean;

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    // si esta la variable "Login" en la localStorage significa que estamos logeados
    if (localStorage.getItem("logged")) {
      // ponemos el booleano de logeado en true
      this.logeado = true;
    } else {
      // si no existe ponemos el booleano de logeado en false
      this.logeado = false;
    }
  }
}
