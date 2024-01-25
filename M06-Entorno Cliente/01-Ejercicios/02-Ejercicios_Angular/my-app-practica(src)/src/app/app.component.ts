import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  // variable para saber si estamos logeados
  logeado!: Boolean;

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    // si esta la variable "Login" en la localStorage significa que estamos logeados
    if (localStorage.getItem("Login")) {
      // ponemos el booleano de logeado en true
      this.logeado = true;
    } else {
      // si no existe ponemos el booleano de logeado en false
      this.logeado = false;
    }
  }

}
