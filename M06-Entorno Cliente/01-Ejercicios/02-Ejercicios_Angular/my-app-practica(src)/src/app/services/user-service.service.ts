import { Injectable } from '@angular/core';
import { User } from '../model/User';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  // creamos los usuarios con los que nos logearemos
  usuarios: User[] = [
    (new User('User1', 'password1')),
    (new User('User2', 'password2')),
    (new User('User3', 'password3')),
    (new User('User4', 'password4')),
    (new User('User5', 'password5')),
    (new User('User6', 'password6')),
    (new User('User7', 'password7')),
    (new User('User8', 'password8')),
    (new User('User9', 'password9')),
    (new User('User10', 'password10')),

  ];

  // constructor() {
  //   this.initUsuarios();
  // }

  // creamos la funcion getUsuarios nos devolvera los usuarios que hallamos creado en el array de usuarios
  getUsuarios(): User[] {
    return this.usuarios;
  }

  // private initUsuarios(): void {
  //   for (let i = 0; i < 11; i++) {
  //     this.usuarios.push(new User('usuario' + i, 'con' + i));
  //   }
  // }

  // funcion para validar que nos estamos logando correctamente, mirando en el array de usuarios accediendo a la variable de el objeto (En la clase User)
  validateUsers(user: User): boolean {
    // El método some verifica si al menos un elemento del array cumple con la condición dada, la condición compara las propiedades nomUsuari y contrasenya del usuario
    return this.usuarios.some(
      (u) =>
        u.nomUsuari === user.nomUsuari && u.contrasenya === user.contrasenya
    );
  }

  // funcion para añadir un usuario que le estamos pasando como parametro
  AñadirUsuario(user: User): void {
    // hacemos un push al array con los usurios, con el usuario que nos an pasado accediendo a las variables nomUsuari i contrasenya de  de el objeto (En la clase User)
    this.usuarios.push(new User(user.nomUsuari, user.contrasenya));
  }

  // funcion para modificar un usuario, que le estamos pasando como parametro el usuario que queremos modificar i el usuario modificado
  ModificarUsuario(userAeditar: User, userEdit: User): void {
    // hacemos un for para recorrer el array
    for (let index = 0; index < this.usuarios.length; index++) {
      // buscamos en el array el usuario que tenga el mismo nombre i contraseña
      if (this.usuarios[index].nomUsuari == userAeditar.nomUsuari && this.usuarios[index].contrasenya == userAeditar.contrasenya) {

        // Cambiamos el nombre de usuario i la contraseña por el que nos an pasado como parametro
        this.usuarios[index].nomUsuari = userEdit.nomUsuari;
        this.usuarios[index].contrasenya = userEdit.contrasenya;
      }
    }

  }

  // funcion para borrar un usuario, pasandole como parametro el usuario que queremos borrar
  DeleteUsuario(userDel: User): void {
    // hacemos un for para recorrer el array
    for (let index = 0; index < this.usuarios.length; index++) {
      // buscamos en el array el usuario que tenga el mismo nombre i contraseña
      if (this.usuarios[index].nomUsuari == userDel.nomUsuari && this.usuarios[index].contrasenya == userDel.contrasenya) {
        
        // Utilizamos splice para eliminar el usuario del array
        this.usuarios.splice(index, 1);
      }
    }

  }
}
