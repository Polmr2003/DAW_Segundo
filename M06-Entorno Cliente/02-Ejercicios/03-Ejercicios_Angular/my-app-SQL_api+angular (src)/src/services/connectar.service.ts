import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ConnectarService {

  constructor(private http: HttpClient) { }

  //mètodes que retornen valors que venen d'una API
  getPosts(): Observable<any> {
    return this.http.get('http://localhost:3000/app/users');
  }

  getUsers(): Observable<any> {
    return this.http.get('http://localhost:3000/app/users');

  }

  // update(id: string, event: any): Observable<any> {
  //   return this._http.put<any>(`${this.url}/events/${id}`, event, { responseType: 'json' }).pipe(
  //     map(res => {
  //       console.log("Respuesta del servidor al actualizar:", JSON.stringify(res));
  //       return res;
  //     })
  //   );
  // }

}
