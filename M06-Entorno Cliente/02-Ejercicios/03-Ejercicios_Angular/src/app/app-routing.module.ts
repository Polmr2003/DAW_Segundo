import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { FormComponent } from './components/form/form.component';
import { NotfoundComponent } from './components/notfound/notfound.component';
import { LoginComponent } from './components/login/login.component';
import { ListUsersComponent } from './components/list-users/list-users.component';
import { LogoutComponent } from './components/logout/logout.component';
import { PaginationComponent } from './components/pagination/pagination.component';
import { CompraComponent } from './components/compra/compra.component';
import { MerchandisingComponent } from './components/merchandising/merchandising.component';


const routes: Routes = [
  {path: 'formulari', component: FormComponent}, // Componente de formulario
  {path: 'login', component: LoginComponent}, // Componente de formulario
  {path: 'list-users', component: ListUsersComponent}, // Componente de formulario
  {path: 'logout', component: LogoutComponent}, // Componente de formulario
  {path: 'pagination', component: PaginationComponent}, // Componente de formulario
  {path: 'compra', component: CompraComponent}, // Componente de formulario
  {path: 'merchandising', component: MerchandisingComponent}, // Componente de formulario

  {path: '', redirectTo:'/formulari', pathMatch:'full'}, //cuando no ponemos nada 
  {path: '**', component: NotfoundComponent} //cuando no encuentra la paguina
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
