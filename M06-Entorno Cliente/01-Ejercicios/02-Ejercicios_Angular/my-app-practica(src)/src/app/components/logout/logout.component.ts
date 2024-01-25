import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
  styleUrls: ['./logout.component.css']
})
export class LogoutComponent {

  constructor(private router: Router) {}

  ngOnInit(): void {
    // borramos la local storage
    localStorage.removeItem('Login');

    // rediriguimos a al paguina de login
    this.router.navigate(['/login']);
  }

}
