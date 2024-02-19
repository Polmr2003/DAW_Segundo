import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-qui-som',
  templateUrl: './qui-som.component.html',
  styleUrls: ['./qui-som.component.css']
})
export class QuiSOMComponent {



  constructor(private router: Router) { 
  }

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    // si esta la variable "Login" en la localStorage significa que estamos logeados
    if (!localStorage.getItem("user")) {
      // ponemos el booleano de logeado en true
      this.router.navigate(['/login']);
    }
  }
}
