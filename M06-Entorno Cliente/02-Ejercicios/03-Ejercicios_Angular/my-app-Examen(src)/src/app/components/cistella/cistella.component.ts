import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cistella',
  templateUrl: './cistella.component.html',
  styleUrls: ['./cistella.component.css']
})
export class CistellaComponent {

  constructor(private router: Router) { }

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    // si esta la variable "Login" en la localStorage significa que estamos logeados
    if (!localStorage.getItem("user")) {
      // ponemos el booleano de logeado en true
      this.router.navigate(['/login']);
    }
  }

}
