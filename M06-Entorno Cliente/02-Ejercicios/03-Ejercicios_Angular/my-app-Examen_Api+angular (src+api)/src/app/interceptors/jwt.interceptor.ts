import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor } from '@angular/common/http';
import { Observable, catchError, throwError } from 'rxjs';

//https://www.positronx.io/laravel-angular-role-based-authentication-with-jwt/

@Injectable()

export class JwtInterceptor implements HttpInterceptor {

  constructor(private router: Router) { }

  // request es la peticion a la api que interceptamos i next es lo que le enviamos a la api
  intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {

    // recojemos el token si existe, que hemos añadido en la localStorage
    const token: any = localStorage.getItem('logged');

    // si esta vacio el token
    if (!token) {
      // manda la peticion sin adjuntar la cabezera de autorizacion que necesitaremos para entrar a los recursos protejidos por el JWT
      return next.handle(request);
    }
    // si no esta vacio el token(existe el token), clonamos la peticion i le añadimos la cabezara de autorizacion con el token que leera la api
    const headers = request.clone({
      headers: request.headers.set('Authorization', `Bearer ${token}`)
    });

    // mandamos la peticion clonada con la cabezera
    return next.handle(headers);

  }
}
