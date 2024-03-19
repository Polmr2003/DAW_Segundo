import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable, of } from 'rxjs';
import { User } from '../model/User';
import { map} from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class HttpService {

  // url de la api
  url:string='http://localhost:3000';

  //
  private usuariSubject: BehaviorSubject<any>;
  public usuario:Observable<any>;//part public del Behabiour Subject

  public usuariData():any{
    return this.usuariSubject.value;
  }

  constructor(private _http: HttpClient) {
   this.usuariSubject= new BehaviorSubject<any>(localStorage.getItem('myToken'));//estat inicial del BehaviorSubject
   this.usuario=this.usuariSubject.asObservable();////part public del Behabiour Subject que s'hi actualitza


  }

  // funciones para conectarse a la api con sus recursos
  getUsers():Observable<any>{
    return this._http.get(this.url+"/allUsers");
  }

  validateLogin(name: string,pass:string):Observable<any>{
        
    return this._http.post<any>(this.url+"/login", {"usuari":name,"contrasenya":pass}, {responseType: "json" }).pipe(
      map(res =>{

        if(!res.error){
          console.log(res.Token);

          localStorage.setItem('logged',res.token);

          this.usuariSubject.next(res.token);
        }
        return res;

      })
    );
  }

  Register(name: string,pass:string):Observable<any>{
    return this._http.post<any>(this.url+"/register", {"usuari":name,"contrasenya":pass}, {responseType: "json" }).pipe(
      map(res =>{
        if(!res.error){
          localStorage.setItem('logged',res.Token);

          this.usuariSubject.next(res.Token);
        }
        return res;

      })
    );
  }

  logout(){
    localStorage.removeItem('myToken');

    this.usuariSubject.next(null);
  }
}
