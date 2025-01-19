<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Card.vue';
import StatCard from '@/Components/StatCard.vue';

const cards1 = [
    {
        bgClass: 'bg-primary',
        iconClass: 'fas fa-shopping-cart',
        value: 1600,
        label: 'Vendas Ultimo Mês',
        percentage: 'Valor Total: R$ 10.000,00',
    },
    {
        bgClass: 'bg-dark',
        iconClass: 'fas fa-money-bill-wave',
        value: 1200,
        label: 'Descontos Aplicados',
        percentage: 'Percentual: 10%',
    },
];

const cards2 = [
{
        bgClass: 'bg-dark',
        iconClass: 'fas fa-chart-line',
        value: 750,
        label: 'Investimentos Ult. Mês',
        percentage: '+25%',
    },
    {
        bgClass: 'bg-dark',
        iconClass: 'fas fa-users',
        value: 300,
        label: 'Clientes',
        percentage: '+10%',
    },
];

const statistics = [
    {
        bgClass: 'bg-primary',
        iconClass: 'fas fa-file-alt text-white text-xxs opacity-10',
        label: 'Tot. Vendas',
        value: 10,
    },
    {
        bgClass: 'bg-success',
        iconClass: 'fas fa-user-plus text-white text-xxs opacity-10',
        label: 'New Users',
        value: 1200,
    },
    {
        bgClass: 'bg-warning',
        iconClass: 'fas fa-chart-line text-white text-xxs opacity-10',
        label: 'Sales',
        value: 750,
    },
    {
        bgClass: 'bg-danger',
        iconClass: 'fas fa-exclamation-triangle text-white text-xxs opacity-10',
        label: 'Issues',
        value: 300,
    },
];

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="row">
        <div class="col-lg-6 col-12">
          <div class="row">
            <Card
                v-for="(card, index) in cards1"
                :key="index"
                :bg-class="card.bgClass"
                :icon-class="card.iconClass"
                :value="card.value"
                :label="card.label"
                :percentage="card.percentage"

            />
          </div>
          <div class="row mt-4">
            <Card
                v-for="(card, index) in cards2"
                :key="index"
                :bg-class="card.bgClass"
                :icon-class="card.iconClass"
                :value="card.value"
                :label="card.label"
                :percentage="card.percentage"
                />
            
          </div>
          <div class="row mt-4">
            <div class="card z-index-2">
            <div class="card-body p-2">
              <h6 class="ms-2 mt-4 mb-0"> Active Users </h6>
              <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p>
              <div class="container border-radius-lg">
                <div class="row">
                    <StatCard
                        v-for="(stat, index) in statistics"
                        :key="index"
                        :bg-class="stat.bgClass"
                        :icon-class="stat.iconClass"
                        :label="stat.label"
                        :value="stat.value"
                    />
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Ultimas Vendas</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    Últimas do <span class="font-weight-bold ms-1">Mês</span>   
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body px-0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cliente</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pagamento</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 1</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $14,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> 19/01/2025</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 2</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $16,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Pix</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 3</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $12,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Dinheiro</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 4</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $10,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Débito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 5</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $18,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 5</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $18,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 5</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $18,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 5</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $18,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fulano 5</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $18,000 </span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Cartão de Crédito</span>
                      </td>
                        <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> 19/01/2025</span>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </AuthenticatedLayout>
</template>
