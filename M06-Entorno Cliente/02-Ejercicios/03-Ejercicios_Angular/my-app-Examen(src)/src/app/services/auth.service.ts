import { Injectable } from '@angular/core';
import { User } from '../model/User';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  // creamos los usuarios con los que nos logearemos
  usuarios: User[] = [
    (new User('User1@gmail.com', '12345678A')),
    (new User('User2@gmail.com', '12345678B')),
    (new User('User3@gmail.com', '12345678C')),
    (new User('User4@gmail.com', '12345678D')),
    (new User('User5@gmail.com', '12345678E')),
    (new User('User6@gmail.com', '12345678F')),
    (new User('User7@gmail.com', '12345678G')),
    (new User('User8@gmail.com', '12345678H')),
    (new User('User9@gmail.com', '12345678I')),
    (new User('User10@gmail.com', '12345678J')),

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
        u.name === user.name && u.password === user.password
    );
  }

  // funcion para añadir un usuario que le estamos pasando como parametro
  AñadirUsuario(user: User): void {
    // hacemos un push al array con los usurios, con el usuario que nos an pasado accediendo a las variables nomUsuari i contrasenya de  de el objeto (En la clase User)
    this.usuarios.push(new User(user.name, user.password));
  }

  // funcion para modificar un usuario, que le estamos pasando como parametro el usuario que queremos modificar i el usuario modificado
  ModificarUsuario(userAeditar: User, userEdit: User): void {
    // hacemos un for para recorrer el array
    for (let index = 0; index < this.usuarios.length; index++) {
      // buscamos en el array el usuario que tenga el mismo nombre i contraseña
      if (this.usuarios[index].name == userAeditar.name && this.usuarios[index].password == userAeditar.password) {

        // Cambiamos el nombre de usuario i la contraseña por el que nos an pasado como parametro
        this.usuarios[index].name = userEdit.name;
        this.usuarios[index].password = userEdit.password;
      }
    }
  }
}
