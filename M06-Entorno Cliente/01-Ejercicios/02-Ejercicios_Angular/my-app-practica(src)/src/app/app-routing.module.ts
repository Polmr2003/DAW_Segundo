import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormComponent } from './components/form/form.component';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { LoginComponent } from './components/login/login.component';
import { ListUsersComponent } from './components/list-users/list-users.component';
import { LogoutComponent } from './components/logout/logout.component';


const routes: Routes = [
  {path: 'formulari', component: FormComponent}, // Componente de formulario
  {path: 'login', component: LoginComponent}, // Componente de formulario
  {path: 'list-users', component: ListUsersComponent}, // Componente de formulario
  {path: 'logout', component: LogoutComponent}, // Componente de formulario

  {path: '', redirectTo:'/formulari', pathMatch:'full'}, //cuando no ponemos nada 
  {path: '**', component: NotfoundComponent} //cuando no encuentra la paguina
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
