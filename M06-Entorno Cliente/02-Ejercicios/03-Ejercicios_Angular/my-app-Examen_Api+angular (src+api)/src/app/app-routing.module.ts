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
import { MyGuardGuard } from './auth/my-guard.guard';
import { logedGuardGuard } from './auth/loged-guard.guard';

const routes: Routes = [
  {path: 'login', component: LoginComponent, canActivate:[logedGuardGuard]}, // Componente de Login
  {path: 'register', component: FormComponent, canActivate:[logedGuardGuard]}, // Componente de register
  {path: 'home', component: HomeComponent}, // Componente de home


  {path: 'QuiSom', component: QuiSOMComponent, canActivate:[MyGuardGuard]}, // Componente de qui som
  {path: 'colecions', component: ColeccionsComponent, canActivate:[MyGuardGuard]}, // Componente de colecions
  {path: 'cistella', component: CistellaComponent, canActivate:[MyGuardGuard]}, // Componente de cistella
  {path: 'areaprivada', component: AreaPrivadaComponent, canActivate:[MyGuardGuard]}, // Componente de area privada
  {path: 'logout', component: LogoutComponent, canActivate:[MyGuardGuard]}, // Componente de logout
  


  {path: '', redirectTo:'/home', pathMatch:'full'}, //cuando no ponemos nada 
  {path: '**', component: NotfoundComponent} //cuando no encuentra la paguina
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
