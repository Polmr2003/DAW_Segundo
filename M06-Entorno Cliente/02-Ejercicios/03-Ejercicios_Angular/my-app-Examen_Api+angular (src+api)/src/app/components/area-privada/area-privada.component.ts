import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-area-privada',
  templateUrl: './area-privada.component.html',
  styleUrls: ['./area-privada.component.css']
})
export class AreaPrivadaComponent {
  constructor(private router: Router) { }

  // miramos si estamos estamos logeados mirando la localStorage
  ngOnInit(): void {
    
  }
}
