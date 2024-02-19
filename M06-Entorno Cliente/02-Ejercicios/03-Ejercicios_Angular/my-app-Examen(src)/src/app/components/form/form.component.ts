import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { User } from 'src/app/model/User';

@Component({
  selector: 'app-form',
  templateUrl: './form.component.html',
  styleUrls: ['./form.component.css'],
})
export class FormComponent {
  //propietats de la classe
  formulari: FormGroup;

  constructor() {
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
  }

  enviament(): void {

  }

}
