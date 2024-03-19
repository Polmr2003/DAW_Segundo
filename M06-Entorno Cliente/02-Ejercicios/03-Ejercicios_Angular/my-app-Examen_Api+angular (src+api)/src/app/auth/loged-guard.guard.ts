import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { HttpService } from '../services/http.service';

@Injectable({
  providedIn: 'root'
})
//https://codingpotions.com/angular-seguridad
export class logedGuardGuard implements CanActivate {
  constructor(private route: Router, private _http: HttpService) {

  }
  canActivate(route: ActivatedRouteSnapshot) {
    if (!localStorage.getItem("logged")) {
      // ponemos el booleano de logeado en true
      return true;
    } else {
      this.route.navigate(['/home']);
      // si no existe ponemos el booleano de logeado en false
      return false;
    }
  }

}
