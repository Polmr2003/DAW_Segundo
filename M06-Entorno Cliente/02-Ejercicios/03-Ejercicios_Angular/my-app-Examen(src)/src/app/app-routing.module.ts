import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormComponent } from './components/form/form.component';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { LoginComponent } from './components/login/login.component';
import { LogoutComponent } from './components/logout/logout.component';
import { QuiSOMComponent } from './components/qui-som/qui-som.component';
import { ColeccionsComponent } from './components/coleccions/coleccions.component';
import { CistellaComponent } from './components/cistella/cistella.component';
import { AreaPrivadaComponent } from './components/area-privada/area-privada.component';
import { HomeComponent } from './components/home/home.component';


const routes: Routes = [
  {path: 'login', component: LoginComponent}, // Componente de Login
  {path: 'register', component: FormComponent}, // Componente de register
  {path: 'home', component: HomeComponent}, // Componente de home


  {path: 'QuiSom', component: QuiSOMComponent}, // Componente de qui som
  {path: 'colecions', component: ColeccionsComponent}, // Componente de colecions
  {path: 'cistella', component: CistellaComponent}, // Componente de cistella
  {path: 'areaprivada', component: AreaPrivadaComponent}, // Componente de area privada
  {path: 'logout', component: LogoutComponent}, // Componente de logout
  


  {path: '', redirectTo:'/home', pathMatch:'full'}, //cuando no ponemos nada 
  {path: '**', component: NotfoundComponent} //cuando no encuentra la paguina
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
